<template>
  <!-- NavBar Template from Bulma IO -->
  <nav
    id="admin-nav"
    class="navbar is-primary is-fixed-top"
    role="navigation"
  >
    <div class="navbar-brand">
      <!-- Titre + Burger -->
      <a
        href="#"
        class="navbar-item"
      > Guillaume ROUX Créations </a>
      <a
        href="#"
        role="button"
        aria-label="menu"
        aria-expanded="false"
        data-target="navMenu"
        :class="'navbar-burger' + activeClass"
        @click="burgerActive = !burgerActive"
      >
        <span aria-hidden="true" />
        <span aria-hidden="true" />
        <span aria-hidden="true" />
      </a>
    </div>

    <div
      id="navMenu"
      :class="'navbar-menu' + activeClass"
    >
      <!-- Left Menu items -->
      <div class="navbar-start">
        <router-link
          class="navbar-item"
          to="/admin/pages"
        >
          Pages
        </router-link>
        <router-link
          class="navbar-item"
          to="/admin/projects"
        >
          Projets
        </router-link>
        <router-link
          class="navbar-item"
          to="/admin/blogs"
        >
          Articles
        </router-link>
      </div>
      <div class="navbar-end">
        <!-- Right Menu items +buttons -->
        <div class="navbar-item">
          <div class="buttons">
            <button
              class="button is-dark"
              @click="$emit('showSignup')"
            >
              S'inscrire
            </button>
            <button
              v-if="isConnected"
              class="button is-dark"
              @click="$emit('disconnect')"
            >
              Se Déconnecter
            </button>
            <button
              v-else
              class="button is-dark"
              @click="$emit('showLogin')"
            >
              Se Connecter
            </button>
          </div>
        </div>
      </div>
    </div>
  </nav>
</template>
<script>
export default {
    props: {
        isConnected: {
            type: Boolean,
            default: false,
        },
    },
    emits: ["showLogin", "showSignup","disconnect"],
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

<style lang="scss" src="@/scss/nav.scss"></style>
