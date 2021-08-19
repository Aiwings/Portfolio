<template src="./Signin.html"></template>
<script>
import Modal from "../../Modal.vue";
import Field from "../../Field";
import Ajax from "@/ajax";
export default {
  components: {
    Modal,
    Field,
  },
  emits: ["signupClose"],
  data() {
    return {
      show: true,
      name: "",
      email: "",
      password: "",
      passwordconf: "",
      message: {
        email: "",
        password: "",
        passwordconf: "",
      },
    };
  },
  watch: {
    email() {
      let regex = /[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+/;
      if (!this.email) {
        this.message.email = "Adresse email requise";
      } else if (!regex.test(this.email)) {
        this.message.email = "Adresse email non valide";
      } else {
        this.message.email = "";
      }
    },
    password() {
      if (!this.password) {
        this.message.password = "Mot de passe requis";
        return;
      }
      let message = [];
      if (this.password.length < 8) {
        message.push("Le mot de passe doit au moins être long de 8 caractères");
      }
      if (this.password.search(/[A-Z]/) < 0) {
        message.push("au moins contenir une majuscule");
      }
      if (this.password.search(/[0-9]/) < 0) {
        message.push("au moins contenir un chiffre");
      }
      if (message.length > 0) {
        this.message.password = message.join("\n");
      } else {
        this.message.password = "";
      }
      if (this.password !== this.passwordconf) {
        this.message.passwordconf = "Les mots de passe ne correspondent pas";
      }
    },
    passwordconf() {
      if (!this.password) {
        this.message.password = "Confirmer le mot de passe";
        return;
      }
      if (this.password !== this.passwordconf) {
        this.message.passwordconf = "Les mots de passe ne correspondent pas";
      } else {
        this.message.passwordconf = "";
      }
    },
  },
  methods: {
    async signUp() {
      let nonEmpty =
        this.name && this.email && this.password && this.passwordconf;
      let errors =
        this.message.email ||
        this.message.password ||
        this.message.passwordconf;
      if (!nonEmpty || errors) {
        return;
      }
      let infos = {
        name: this.name,
        email: this.email,
        password: this.password,
      };
      let ajax = new Ajax();
      const signin = await ajax.post("/api/signup", infos);
      console.log(signin);
    },
  },
};
</script>

<style>
</style>