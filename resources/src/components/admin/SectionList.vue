<template>
  <div
    v-for="section in sections"
    :key="section"
    class="panel-block"
    @click="openEditor(section)"
  >
    {{ section }}
  </div>
  <div class="panel-block">
    <button
      class="button is-link is-outlined is-fullwidth"
      @click="openEditor('new')"
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