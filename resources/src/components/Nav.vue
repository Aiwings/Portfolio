<template>
  <!-- NavBar Template from Bulma IO -->
  <nav class="navbar" role="navigation" id="main-nav">
    <div class="navbar-brand">
      <!-- Titre + Burger -->
      <a href="#" class="navbar-item"> Guillaume ROUX Créations </a>
      <a
        href="#"
        role="button"
        aria-label="menu"
        aria-expanded="false"
        data-target="navMenu"
        @click="burgerActive = !burgerActive"
        :class="'navbar-burger' + activeClass"
      >
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
      </a>
    </div>

    <div id="navMenu" :class="'navbar-menu' + activeClass">
      <!-- Left Menu items -->
      <div class="navbar-start">
        <a href="#" class="navbar-item">Accueil</a>
        <a href="#" class="navbar-item">Projets</a>
        <a href="#" class="navbar-item">Blog</a>
        <a href="#" class="navbar-item">Contact</a>
      </div>
      <div class="navbar-end">
        <!-- Right Menu items +buttons -->
        <div class="navbar-item">
          <div class="buttons">
            <a href="#" class="button is-dark">Github</a>
            <a href="#" class="button is-dark">Facebok</a>
            <a href="#" class="button is-link">CV</a>
          </div>
        </div>
      </div>
    </div>
  </nav>
</template>
<script>
export default {
  data() {
    return {
      burgerActive: false,
    };
  },
  computed: {
    activeClass: function () {
      return this.burgerActive ? " is-active" : "";
    },
  },
};
</script>

<style lang="scss" src="../scss/nav.scss"></style>