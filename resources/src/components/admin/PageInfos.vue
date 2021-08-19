<template>
  <article class="page-infos">
    <form @submit.prevent="submit" class="box">
      <Field
        name="title"
        title="Titre de la page"
        type="text"
        v-model="title"
      ></Field>
      <label class="label" for="description"
        >Meta description de la page
      </label>
      <textarea
        name="description"
        v-model="description"
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
  data() {
    return {
      title: "",
      description: "",
    };
  },
  methods: {
    submit() {},
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