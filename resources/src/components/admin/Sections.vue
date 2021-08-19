<template>
  <div
    class="panel-block"
    v-for="section in sections"
    v-bind:key="section"
    @click="modify(section.name)"
  >
    {{ section.content }}
  </div>
  <div class="panel-block">
    <button
      v-on:click="buttonClicked"
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
      sections: [
        {
          name: "",
          content: "",
        },
      ],
    };
  },
  async created() {
    let pageId = this.$route.params.id;
    if (parseInt(pageId) === 0) {
      return;
    }
    try {
      let ajax = new Ajax();
      let req = await ajax.get(`/api/page/${pageId}/sections`);
      this.sections.concat(req);
    } catch (err) {
      alert(err.message);
    }
  },
};
</script>

<style>
</style>