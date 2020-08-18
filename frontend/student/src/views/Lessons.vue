<template>
  <v-flex class="ma-2">
    <v-skeleton-loader :loading="isLoading" type="list-item, list-item">
      <v-expansion-panels :value="activeLessonIndex">
        <v-expansion-panel v-for="lesson in filteredLessons" :key="lesson.id">
          <v-expansion-panel-header>{{ lesson.date }}</v-expansion-panel-header>

          <v-expansion-panel-content>
            <lesson :lesson="lesson" />
          </v-expansion-panel-content>
        </v-expansion-panel>
      </v-expansion-panels>
    </v-skeleton-loader>
  </v-flex>
</template>

<script>
import { getDayText } from "@/utils";

// import Lessons from "@/components/Lesson/Lessons";
import Lesson from "@/components/Lesson/Lesson";

export default {
  name: "LessonsView",

  components: {
    // Lessons
    Lesson
  },

  data: () => ({
    lessons: [],
    currentLesson: null,
    activeLessonIndex: 0,
    isLoading: false
  }),

  computed: {
    filteredLessons() {
      return this.lessons.map(lesson => {
        lesson.date = this.formatLessonDate(lesson.date);
        return lesson;
      });
    }
  },

  created() {
    this.setLoadedLessons();
  },

  methods: {
    async setLoadedLessons() {
      this.isLoading = true;

      try {
        const response = await axios.get("lessons");
        const data = response.data;
        this.lessons = data && data.data;
        this.setActiveLesson();
        this.isLoading = false;
      } catch (error) {
        this.isLoading = false;
      }
    },

    formatLessonDate(dateText = "") {
      const DATE = new Date(dateText);
      const localeDate = DATE.toLocaleDateString();
      const time = DATE.toLocaleTimeString().slice(0, 5);
      const day = "(" + getDayText(DATE.getDay()) + ")";

      return [localeDate, time, day].join(" ");
    },

    setActiveLesson() {
      const NOW = new Date();
      const filterPastLessons = lesson => new Date(lesson.date) > NOW;
      const countFutureLessons = this.lessons.filter(filterPastLessons).length;
      if (countFutureLessons <= 0) return 0;

      this.activeLessonIndex = countFutureLessons - 1;
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
