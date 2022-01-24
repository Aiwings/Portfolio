/<template>
  <nav-admin
    :is-connected="isConnected"
    @show-login="loginShown = true"
    @show-signup="signupShown = true"
  />
  <LoginModal
    v-if="loginShown"
    @login-close="loginShown = false"
    @connected="onLogin"
  />
  <SigninModal
    v-if="signupShown"
    @signup-close="signupShown = false"
  />
  <div class="container top-navbar">
    <router-view />
  </div>
</template>

<script>
import Ajax from "@/ajax";
import NavAdmin from "./NavBar.vue";
import SigninModal from "./SigninModal";
import LoginModal from "./LoginModal.vue";
export default {
  components: {
    "nav-admin": NavAdmin,
    SigninModal,
    LoginModal,
  },
  data() {
    return {
      loginShown: false,
      signupShown: false,
      isConnected: false,
    };
  },
  created() {
    let cookie = Ajax.getCookie("token");
    console.log(cookie);
    this.isConnected = cookie !== undefined;
  },

  methods: {
    onLogin() {
      this.isConnected = true;
      this.loginShown = false;
    },
  },
};
</script>

<style>
.top-navbar {
  margin-top: 50px;
}
</style>
