<template>
  <panel
    heading="Pages"
    @goTo="goTo"
    @newItem="newItem"
    :hasButton="true"
  ></panel>
  <router-view></router-view>
</template>

<script>
import Panel from "../Panel.vue";
export default {
  components: {
    panel: Panel,
  },
  data() {
    return {};
  },
  methods: {
    goTo(link) {},
    newItem() {
      console.log(this.$router);
      this.$router.push({ name: "page-edit", params: { name: "new" } });
    },
  },
};
</script>

<style>
.panel {
  margin-top: 100px;
}
</style>