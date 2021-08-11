<template>
  <section class="section select-pages">
    <h1 class="title">Edition d'une Page</h1>
    <div class="select is-medium">
      <select @change="goTo($event)">
        <option v-for="page in pages" v-bind:key="page" :value="page">
          {{ page.title }}
        </option>
      </select>
    </div>
    <button class="button is-primary">Nouvelle Page</button>
  </section>
  <router-view></router-view>
</template>

<script>
import Panel from "../Panel.vue";
export default {
  components: {
    panel: Panel,
  },
  data() {
    return {
      pages: [
        {
          id: "",
          title: "Selectionner la page",
        },
      ],
    };
  },
  methods: {
    goTo(event) {
      console.log(event);
      // this.$router.push({
      //   name: "page-edit",
      //   params: { name: event.target.value.slug },
      // });
    },
  },
};
</script>

<style lang="scss" scoped>
.select-pages {
  display: flex;
  justify-content: center;
  align-items: center;
  h1,
  .select {
    margin: 0 20px;
  }
}
</style>