<template>
  <v-card class="ma-2">
    <v-skeleton-loader :loading="isLoading" type="list-item">
      <v-expansion-panels>
        <v-expansion-panel v-for="lesson in lessons" :key="lesson.id">
          <v-expansion-panel-header>{{ lesson.date }}</v-expansion-panel-header>
          <v-expansion-panel-content>
            <LessonsHomework :lesson="lesson" />
          </v-expansion-panel-content>
        </v-expansion-panel>
      </v-expansion-panels>
    </v-skeleton-loader>
  </v-card>
</template>

<script>
import LessonsHomework from "@/components/LessonsHomework";

export default {
  name: "Lessons",

  components: {
    LessonsHomework
  },

  data: () => ({
    lessons: [],
    currentLesson: null,
    isLoading: false
  }),

  created() {
    this.loadLessons();
  },

  methods: {
    loadLessons() {
      this.isLoading = true;
      return new Promise(resolve => {
        setTimeout(() => {
          this.lessons = [
            { id: 1, date: "01.07.2020" },
            { id: 2, date: "08.07.2020" }
          ];
          this.isLoading = false;
          return resolve();
        }, 1000);
      });
    },

    setLesson(id) {
      console.log(id);
      this.currentLesson = this.lessons.find(lesson => id == lesson.id);
    }
  }
};
</script>

<style lang="scss" scoped>
.week-days {
  min-height: 20px;

  .v-list-item__content {
    height: 20px;
  }
}

.v-list-item {
  padding: 0 2px;
  transition: border-color 0.2s;
  border: 2px dashed transparent;
}

.border {
  border-color: blue;
}

.v-list-item__content {
  padding: 2px 0;
  height: 52px;

  .lessons-week {
    margin: 0;
  }
}

.lessons-week {
  display: flex;
  align-items: center;
  justify-content: center;

  flex: 1 0 calc(100% / 7);
  // background-color: red;
  height: 100%;
  border-right: 1px solid;

  &:nth-last-child(1) {
    border-right: none;
  }
}
</style>
