import { createRouter, createWebHistory } from "vue-router";
import Home from "@/views/Home.vue";
import Readability from "@/views/Readability.vue";
import MainView from "@/mainview/MainView.vue";
import Sentiment from "../views/Sentiment.vue";
import AnalisisView from "../mainview/AnalisisView.vue";

const routes = [
  {
    path: "/",
    component: MainView,
    children: [{ path: "", name: "Home", component: Home }],
  },
  {
    path: "/analisis",
    component: AnalisisView,
    children: [
      { path: "readability", name: "Readable", component: Readability },
      { path: "sentiment", name: "Sentiment", component: Sentiment },
    ],
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
