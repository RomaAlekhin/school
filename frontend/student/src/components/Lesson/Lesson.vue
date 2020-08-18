<template>
  <v-flex>
    <v-card class="mx-auto" flat>
      <v-card-subtitle class="pb-0">Статус посещения</v-card-subtitle>

      <v-card-text class="text--primary">
        <div>{{ status }}</div>
      </v-card-text>
    </v-card>

    <v-card class="mx-auto" flat>
      <v-card-subtitle class="pb-0">Домашнее задание</v-card-subtitle>

      <v-card-text class="text--primary">
        <div>{{ homework }}</div>
      </v-card-text>
    </v-card>

    <v-card class="mx-auto" flat>
      <v-card-subtitle class="pb-0">Оценки</v-card-subtitle>

      <v-card-text class="text--primary">
        <div class="marks">
          <div
            class="mark"
            v-for="(mark, index) in marks"
            :key="`mark_${index}`"
          >
            <div class="mark__description">{{ mark.description }}</div>
            <div class="mark__value">{{ mark.value }}</div>
          </div>
        </div>
      </v-card-text>
    </v-card>
  </v-flex>
</template>

<script>
import reduce from "lodash/reduce";
import { mapGetters } from "vuex";

export default {
  name: "Lesson",

  props: {
    lesson: {
      type: Object,
      default: () => ({})
    }
  },

  data: () => ({
    marksDescription: {
      mark_activity: "Активность",
      mark_behaviour: "Поведение",
      mark_homework: "Домашнее задание",
      mark_knowledge: "Знания"
    }
  }),

  computed: {
    ...mapGetters({
      getCatalog: "catalog/getCatalog"
    }),

    statuses() {
      return this.getCatalog("statuses");
    },

    marks() {
      return reduce(
        this.lesson,
        (acc, value, key) => {
          if (!key.includes("mark_")) return acc;
          const description = this.marksDescription[key];
          acc.push({ description, value });
          return acc;
        },
        []
      );
    },

    status() {
      const ID = this.lesson.status_id;
      const STATUS = this.statuses.find(status => status.id == ID);
      return (STATUS && STATUS.name) || "Статус не определён";
    },

    homework() {
      return this.lesson.homework || "Отсутствует домашнее задание";
    }
  }
};
</script>

<style scoped>
.mark {
  display: flex;
  justify-content: space-between;
}
</style>
