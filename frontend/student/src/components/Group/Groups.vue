<template>
  <v-card justify="center" class="my-1">
    <v-skeleton-loader :loading="isLoading" type="list-item, list-item">
      <v-tabs v-model="tabs" center-active>
        <v-tab v-for="group in groups" :key="group.id">{{ group.name }}</v-tab>
        <v-tab-item v-for="group in groups" :key="group.id">
          <group-teacher :teacher="group.teacher" />
          <group-schedule class="mt-5" :schedules="group.schedules" />
        </v-tab-item>
      </v-tabs>
    </v-skeleton-loader>
  </v-card>
</template>

<script>
import GroupTeacher from "./GroupTeacher";
import GroupSchedule from "./GroupSchedule";

export default {
  name: "Groups",

  components: {
    GroupTeacher,
    GroupSchedule
  },

  props: {
    groups: {
      type: Array,
      default: () => []
    },

    isLoading: {
      type: Boolean,
      default: () => false
    }
  },

  data: () => ({
    schedule: [],
    tabs: null
  })
};
</script>
