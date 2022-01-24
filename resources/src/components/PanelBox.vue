<template>
  <article class="panel is-primary">
    <div class="panel-heading">
      <a
        v-if="hasPrev"
        href=""
        class="is-light"
        @click="$emit('prevClicked')"
      >
        <svg-vue
          class="iconsvg arrow-left"
          icon="arrow-left"
        />
      </a>
      {{ title }}
    </div>
    <div
      v-if="tabs"
      class="panel-tabs"
    >
      <router-link
        v-for="tab in tabs"
        :key="tab"
        :to="tab.to"
        :class="activeTab == tab.id ? 'is-active' : ''"
        @click="$emit('changeTab', tab.id)"
      >
        {{ tab.text }}
      </router-link>
    </div>
    <slot />
  </article>
</template>

<script>
export default {
  props: {
    title: {
      type: String,
      default:"Panel title"
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
      default: () => {
        return [];
      },
    },
  },
  emits: ["changeTab", "prevClicked"],
  computed: {},
  methods: {
    // buttonClicked() {
    //   this.$emit("newItem");
    // },
  },
};
</script>

<style>
.panel-heading a {
  margin-right: 20px;
}
</style>
