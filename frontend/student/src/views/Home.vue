<template>
  <v-flex>
    <v-card justify="center" class="my-1" v-if="false">
      <v-card-title>Расписание</v-card-title>
      <v-date-picker
        v-model="schedule"
        no-title
        full-width
        multiple
        locale="ru"
        first-day-of-week="1"
        :picker-date.sync="pickerDate"
      />
      <!-- {{ schedule }} -->
      <!-- {{ pickerDate }} -->
    </v-card>

    <groups :groups="groups" :is-loading="isLoadingGroups" />
  </v-flex>
</template>

<script>
import Groups from "@/components/Group/Groups";

export default {
  name: "Home",

  components: {
    Groups
  },

  data: () => ({
    schedule: [],
    pickerDate: null,
    tabs: null,
    currentLesson: null,
    groups: [],
    teachers: [],
    isLoadingGroups: false,
    isLoadingTeachers: false
  }),

  computed: {
    isAuthenticated() {
      return this.$store.state.auth.isAuthenticated;
    },

    user() {
      return this.$store.state.auth.user;
    },

    userEmail() {
      return (this.user && this.user.email) || "";
    }
  },

  // watch: {
  //   pickerDate(date) {
  //     // this.schedule = [];
  //     // let firstDay = new Date(date);
  //     // let firstDayOfWeek = firstDay.getDay();
  //     // console.log(new Date(date));
  //   }
  // },

  created() {
    this.setLoadedGroups();
    // this.setLoadedTeachers();
    // this.setLoadedAverageGrade();
  },

  methods: {
    async setLoadedGroups() {
      this.isLoadingGroups = true;

      try {
        const response = await axios.get("groups");
        const data = response.data;
        this.groups = data && data.data;
        this.isLoadingGroups = false;
      } catch (error) {
        this.isLoadingGroups = false;
      }
    }

    // async setLoadedTeachers() {
    //   this.isLoadingTeachers = true;

    //   try {
    //     const response = await axios.get("teachers");
    //     this.teachers = response.data;
    //     this.isLoadingTeachers = false;
    //   } catch (error) {
    //     this.isLoadingTeachers = false;
    //   }
    // }

    // async setLoadedAverageGrade() {
    //   this.isLoading = true;

    //   try {
    //     const response = await axios.get("groups");
    //     this.averageGrade = response.data;
    //     this.isLoading = false;
    //   } catch (error) {
    //     this.isLoading = false;
    //   }
    // }
  }
};
</script>
