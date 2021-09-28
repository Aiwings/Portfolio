<template>
  <div
    class="panel-block"
    v-for="section in sections"
    v-bind:key="section"
    @click="openEditor(section)"
  >
    {{ section }}
  </div>
  <div class="panel-block">
    <button
      @click="openEditor('new')"
      class="button is-link is-outlined is-fullwidth"
    >
      AJouter une section
    </button>
  </div>
</template>

<script>
import Ajax from "@/ajax";
export default {
  props: {},
  data() {
    return {
      sections: [],
    };
  },
  async created() {
    let pageId = this.$route.params.id;
    if (parseInt(pageId) === 0) {
      return;
    }
    try {
      let ajax = new Ajax();
      let req = await ajax.request(`/api/page/${pageId}/sections`);
      this.sections = req;
    } catch (err) {
      alert(err.message);
    }
  },
  methods: {
    openEditor(slug) {
      console.log(slug);
      this.$router.push({
        name: "section-edit",
        params: {
          slug: slug,
        },
      });
    },
  },
};
</script>

<style>
</style>