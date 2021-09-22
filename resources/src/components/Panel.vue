<template>
  <article class="panel is-primary">
    <div class="panel-heading">
      <a v-if="hasPrev" href="" @click="$emit('prevClicked')" class="is-light">
        <svg-vue class="iconsvg arrow-left" icon="arrow-left"></svg-vue>
      </a>
      {{ title }}
    </div>
    <div class="panel-tabs" v-if="tabs">
      <router-link
        v-for="tab in tabs"
        v-bind:key="tab"
        :to="tab.to"
        @click="$emit('changeTab', tab.id)"
        :class="activeTab == tab.id ? 'is-active' : ''"
      >
        {{ tab.text }}
      </router-link>
    </div>
    <slot></slot>
  </article>
</template>

<script>
export default {
  props: {
    title: {
      type: String,
    },
    activeTab: {
      type: Number,
      required: true,
    },
    hasPrev: {
      type: Boolean,
      default: false,
    },
    tabs: {
      type: Array,
    },
  },
  computed: {},
  methods: {
    buttonClicked() {
      this.$emit("newItem");
    },
  },
  emits: ["changeTab", "prevClicked"],
};
</script>

<style>
.panel-heading a {
  margin-right: 20px;
}
</style>