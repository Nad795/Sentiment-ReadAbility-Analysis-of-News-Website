<template>
  <div class="min-h-screen bg-primarywhite">
    <HeroSection />
    <FiturSection />
    <CardSection />
  </div>
</template>

<script setup lang="ts">
import { defineAsyncComponent } from "vue";
const HeroSection = defineAsyncComponent(
  () => import("@/components/layout/HeroSection.vue")
);
const FiturSection = defineAsyncComponent(
  () => import("@/components/layout/FiturSection.vue")
);
const CardSection = defineAsyncComponent(
  () => import("@/components/layout/CardSection.vue")
);
</script>

<style scoped></style>
