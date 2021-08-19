<template>
  <section class="section select-pages">
    <h1 class="title">Edition d'une Page</h1>
    <div class="select is-medium">
      <select @change="goTo($event.target.value)">
        <option v-for="page in pages" v-bind:key="page" :value="page.id">
          {{ page.name }}
        </option>
      </select>
    </div>
    <button class="button is-primary" @click="goTo(0)">Nouvelle Page</button>
  </section>
  <router-view></router-view>
</template>

<script>
import Ajax from "@/ajax";
export default {
  data() {
    return {
      pages: [
        {
          id: 0,
          name: "Selectionner la page",
        },
      ],
    };
  },
  async created() {
    console.log(Ajax);
    try {
      const ajax = new Ajax();
      const resp = await ajax.get("/api/pages");
      this.pages.concat(resp.data);
    } catch (err) {
      alert(err.message);
    }
  },
  methods: {
    goTo(id) {
      let page = {};
      if (id == 0) {
        page.id = 0;
        let name = prompt("Nom de la nouvelle page", "");
        if (name !== null || name !== "") {
          page["name"] = name;
        }
      } else {
        page = this.pages.filter((el) => {
          el.id = id;
        })[0];
        console.log(page);
      }

      this.$router.push({
        name: "page-infos",
        params: { id: id, name: page.name },
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