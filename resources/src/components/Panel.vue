<template>
  <article class="panel is-primary">
    <p class="panel-heading">{{ heading }}</p>
    <div
      class="panel-block"
      v-for="block in blocks"
      v-bind:key="block"
      v-on="block.link ? { click: $emit('goTo', block.link) } : {}"
    >
      {{ block.content }}
    </div>
    <div class="panel-block" v-if="hasButton">
      <button
        v-on:click="buttonClicked"
        class="button is-link is-outlined is-fullwidth"
      >
        AJouter du contenu
      </button>
    </div>
  </article>
</template>

<script>
export default {
  props: {
    heading: {
      type: String,
      required: true,
    },
    hasButton: {
      type: Boolean,
    },
    blocks: {
      type: Array,
      default() {
        return [
          {
            link: "",
            content: "No content availlable",
          },
        ];
      },
    },
  },
  methods: {
    buttonClicked() {
      this.$emit("newItem");
    },
  },
  emits: ["goTo", "newItem"],
};
</script>

<style>
</style>