<template>
  <article class="page-infos">
    <form @submit.prevent="submit" class="box">
      <Field
        name="title"
        title="Titre de la page"
        type="text"
        v-model="page.title"
      ></Field>
      <Field
        name="slug"
        title="Nom de la page - affiché dans l'URL"
        type="text"
        v-model="page.slug"
      ></Field>
      <label class="label" for="description"
        >Meta description de la page (250 caractères max)
      </label>
      <textarea
        name="description"
        v-model="page.description"
        cols="30"
        rows="10"
        class="textarea"
        placeholder="meta-description"
      ></textarea>
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
import Field from "../Field";

export default {
  components: {
    Field,
  },
  props: {
    page: {
      type: Object,
      default: {
        title: "Nouvelle Page",
        slug: "",
        description: "",
      },
    },
  },
  methods: {
    submit() {
      this.$emit("pageChanged", this.page);
    },
  },
  computed: {},
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