<template>
  <v-flex class="ma-2">
    <v-skeleton-loader :loading="isLoading" type="list-item, list-item">
      <v-expansion-panels :value="1">
        <v-expansion-panel v-for="lesson in lessons" :key="lesson.id">
          <v-expansion-panel-header>{{ lesson.date }}</v-expansion-panel-header>

          <v-expansion-panel-content>
            <LessonsHomework :lesson="lesson" />
          </v-expansion-panel-content>
        </v-expansion-panel>
      </v-expansion-panels>
    </v-skeleton-loader>
  </v-flex>
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
    this.setLoadedLessons();
  },

  methods: {
    async setLoadedLessons() {
      this.isLoading = true;

      try {
        const response = await axios.get("lesson");
        this.lessons = response.data;
        this.isLoading = false;
      } catch (error) {
        this.isLoading = false;
      }
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
