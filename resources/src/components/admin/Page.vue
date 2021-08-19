<template>
  <panel
    :heading="name"
    :tabs="tabs"
    :activeTab="active"
    @changeTab="tabChange"
    :hasPrev="true"
    @prevClicked="prev"
  >
    <router-view></router-view>
  </panel>
</template>

<script>
import Panel from "../Panel.vue";
export default {
  props: {
    id: {
      type: Number,
      default: 0,
    },
    name: {
      type: String,
      default: "name",
    },
  },
  data() {
    return {
      active: 0,
      tabs: [
        {
          id: 0,
          text: "Informations",
          to: `/admin/page/${this.id}-${this.name}/`,
        },
        {
          id: 1,
          text: "Sections",
          to: `/admin/page/${this.id}-${this.name}/sections`,
        },
        {
          id: 2,
          text: "Blocks",
          to: `/admin/page/${this.id}-${this.name}/blocks`,
        },
      ],
    };
  },
  computed: {},
  methods: {
    tabChange(tabId) {
      this.active = tabId;
    },
    prev() {
      this.$router.replace({
        name: "pages",
      });
    },
  },
  components: {
    panel: Panel,
  },
};
</script>

<style>
.panel {
  margin-top: 100px;
}
</style>