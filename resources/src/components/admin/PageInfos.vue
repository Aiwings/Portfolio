<template>
  <article class="page-infos">
    <form
      class="box"
      @submit.prevent="submit"
    >
      <FormField
        v-model="current.title"
        name="title"
        title="Titre de la page"
        type="text"
      />
      <FormField
        v-model="current.slug"
        name="slug"
        title="Nom de la page - affiché dans l'URL"
        type="text"
      />
      <label
        class="label"
        for="description"
      >Meta description de la page (250 caractères max)
      </label>
      <textarea
        v-model="current.description"
        name="description"
        cols="30"
        rows="10"
        class="textarea"
        placeholder="meta-description"
      />
      <div class="submit is-flex is-justify-content-center">
        <button
          class="button is-medium is-primary is-outlined is-centered"
          type="submit"
        >
          Soumettre les changements
        </button>
      </div>
    </form>
  </article>
</template>

<script>
import FormField from "../FormField";

export default {
  components: {
    FormField,
  },
  props: {
    page: {
      type: Object,
      default() {
        return {
          title: "Nouvelle Page",
          slug: "",
          description: "",
        };
      },
    },
  },
  emits:["pageChanged"],
  computed: {
    current: {
      get(){
        return this.page;
      },
      set(){

      }
    }
  },
  methods: {
    submit() {
      this.$emit("pageChanged", this.page);
    },
  },
};
</script>

<style>
form {
  padding: 0 10px;
}
.submit {
  padding: 15px 0;
}
</style>