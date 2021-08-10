<template>
  <h1>Edition de la Page</h1>
  <textedit></textedit>
</template>

<script>
import TextEdit from "../TextEdit.vue";
export default {
  props: ["name"],
  components: {
    textedit: TextEdit,
  },
};
</script>

<style>
</style>