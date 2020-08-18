<template>
  <v-flex>
    <v-subheader>Преподаватель</v-subheader>

    <v-list shaped>
      <v-list-item>
        <v-list-item-icon>
          <v-icon>mdi-account</v-icon>
        </v-list-item-icon>
        <v-list-item-content>
          <v-list-item-title v-text="teacher.name"></v-list-item-title>
        </v-list-item-content>
      </v-list-item>

      <!-- <v-list-item>
        <v-list-item-icon>
          <v-icon>mdi-bell</v-icon>
        </v-list-item-icon>
        <v-list-item-content>
          <v-list-item-title v-text="teacher.specialty"></v-list-item-title>
        </v-list-item-content>
      </v-list-item> -->
    </v-list>
  </v-flex>
</template>

<script>
export default {
  name: "GroupTeacher",

  props: {
    teacher: {
      type: Object,
      default: () => ({})
    }
  }
};
</script>
