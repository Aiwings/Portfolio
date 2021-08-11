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
      <div v-if="message" :class="is - warning">
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
      const ajax = new Ajax();
      try {
        const login = await ajax.post("/admin/login", this.form);
        document.cookie = JSON.stringify(login);
        console.log("logged in");
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