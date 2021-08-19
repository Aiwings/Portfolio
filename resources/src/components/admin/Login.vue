/<template>
  <Modal
    title="Connexion"
    @modalAction="login"
    @modalClose="$emit('loginClose')"
  >
    <form @submit.prevent="submit">
      <Field
        title="Adresse Email"
        type="email"
        name="email"
        icon="user"
        placeholder="email"
        v-model="form.email"
      ></Field>
      <Field
        title="Mot de passe"
        type="password"
        name="password"
        icon="lock"
        placeholder="mot de passe"
        v-model="form.password"
      ></Field>
      <div v-if="message" class="is-warning">
        <div class="message-body">{{ message }}</div>
      </div>
    </form>
  </Modal>
</template>

<script>
import Modal from "../Modal.vue";
import Field from "../Field";
import Ajax from "@/ajax";
export default {
  components: {
    Modal,
    Field,
  },
  emits: ["loginClose"],
  data() {
    return {
      show: true,
      form: {
        email: "",
        password: "",
      },
      message: "",
    };
  },
  methods: {
    async login() {
      try {
        let ajax = new Ajax();
        const login = await ajax.post("/api/login", this.form);
        if (login.success) {
          let cookieString = `token=${login.token};`;
          cookieString += "samesite=lax;";
          let maxAge = 7 * 24 * 60 * 60;
          cookieString += `max-age=${maxAge};`;
          cookieString += "secure;";
          document.cookie = cookieString;
          console.log("logged in", login.token);
        } else {
          throw new Error();
        }
      } catch (error) {
        console.log(error.message);
        this.message = "La Connexion a échouée";
      }
    },
  },
};
</script>

<style>
</style>