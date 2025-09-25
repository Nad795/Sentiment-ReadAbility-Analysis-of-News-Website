<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Cloud\Language\LanguageClient;

class SentimentAnalysisController extends Controller
{
    // Fungsi utama API
    public function analyze(Request $request)
    {
        $text = $request->input('text'); // Ambil input dari frontend

        if (!$text) {
            return response()->json([
                'error' => 'Text is required'
            ], 400);
        }

        // Analisis Sentimen (Google NLP)
        $sentiment = $this->analyzeSentiment($text);

        // Analisis Keterbacaan (Flesch Reading Ease)
        $readability = $this->analyzeReadability($text);

        return response()->json([
            'text' => $text,
            'sentiment' => $sentiment,
            'readability' => $readability
        ]);
    }

    private function analyzeSentiment($text)
    {
        $language = new LanguageClient([
            'keyFilePath' => env('GOOGLE_CLOUD_KEY_FILE') // ambil path dari .env
        ]);

        $annotation = $language->analyzeSentiment($text);
        $sentiment = $annotation->sentiment();

        return $sentiment['score'] > 0 ? 'Positive'
             : ($sentiment['score'] < 0 ? 'Negative' : 'Neutral');
    }

    private function analyzeReadability($text)
    {
        return $this->fleschReadingEase($text);
    }

    private function fleschReadingEase($text)
    {
        $words = str_word_count($text, 1);
        $sentences = preg_split('/[.!?]+/', $text, -1, PREG_SPLIT_NO_EMPTY);
        $wordCount = max(1, count($words));
        $sentenceCount = max(1, count($sentences));
        $syllableCount = 0;

        foreach ($words as $word) {
            $syllableCount += $this->countSyllables($word);
        }

        return 206.835
             - (1.015 * ($wordCount / $sentenceCount))
             - (84.6 * ($syllableCount / $wordCount));
    }

    private function countSyllables($word)
    {
        $vowels = ['a', 'e', 'i', 'o', 'u', 'y'];
        $syllables = 0;
        $previousCharIsVowel = false;

        for ($i = 0; $i < strlen($word); $i++) {
            $char = strtolower($word[$i]);
            if (in_array($char, $vowels)) {
                if (!$previousCharIsVowel) {
                    $syllables++;
                }
                $previousCharIsVowel = true;
            } else {
                $previousCharIsVowel = false;
            }
        }

        return max(1, $syllables); // minimal 1 suku kata per kata
    }
}
