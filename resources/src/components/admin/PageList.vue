<template>
  <section class="section select-pages">
    <h1 class="title">
      Edition d'une Page
    </h1>
    <div class="select is-medium">
      <select @change="goTo($event.target.value)">
        <option
          v-for="page in pages"
          :key="page"
          :value="page.id"
        >
          {{ page.title }}
        </option>
      </select>
    </div>
    <button
      class="button is-primary"
      @click="goTo(0)"
    >
      Nouvelle Page
    </button>
  </section>
  <router-view />
</template>

<script>
import Ajax from "@/ajax";
export default {
  data() {
    return {
      pages: [
        {
          id: 0,
          title: "Selectionner la page",
        },
      ],
    };
  },
  async created() {
    try {
      const ajax = new Ajax();
      const resp = await ajax.request("/api/pages");
      this.pages = this.pages.concat(resp);
    } catch (err) {
      alert(err.message);
    }
  },
  methods: {
    goTo(id) {
      console.log(id);
      let page = {};
      if (id == 0) {
        page.id = 0;
        page.title = "Nouvelle page";
      } else {
        page = this.pages.filter((el) => parseInt(el.id) === parseInt(id))[0];
        this.$route.meta["page"] = page;
        console.log(this.$route.meta);
      }

      this.$router.push({
        name: "page-edit",
        params: { id: id, page: JSON.stringify(page) },
      });
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