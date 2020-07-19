<template>
  <v-card class="mx-auto" max-width="400" flat>
    <v-card-subtitle class="pb-0">Домашнее задание</v-card-subtitle>

    <v-card-text class="text--primary">
      <div>{{ lesson.homework }}</div>
    </v-card-text>
  </v-card>
</template>

<script>
export default {
  name: "LessonsHomework",

  props: {
    lesson: {
      type: Object,
      default: () => ({})
    }
  },

  data: () => ({})
};
</script>
