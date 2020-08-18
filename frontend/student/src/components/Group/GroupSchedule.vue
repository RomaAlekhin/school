<template>
  <v-flex>
    <v-subheader>Расписание</v-subheader>

    <v-list shaped>
      <v-list-item v-for="schedule in filteredSchedules" :key="schedule.id">
        <v-list-item-icon>
          <v-icon>mdi-calendar</v-icon>
        </v-list-item-icon>
        <v-list-item-content>
          <v-list-item-title v-text="schedule"></v-list-item-title>
        </v-list-item-content>
      </v-list-item>
    </v-list>
  </v-flex>
</template>

<script>
import { getDayText } from "@/utils";

export default {
  name: "GroupSchedule",

  props: {
    schedules: {
      type: Array,
      default: () => []
    }
  },

  data: () => ({}),

  computed: {
    filteredSchedules() {
      return this.schedules.map(this.getScheduleText);
    }
  },

  methods: {
    getScheduleText(schedule = {}) {
      const { day = 0, time = "" } = schedule;
      const dayText = getDayText(day);
      const timeText = time.slice(0, 5);

      return `${dayText} в ${timeText}`;
    }
  }
};
</script>
