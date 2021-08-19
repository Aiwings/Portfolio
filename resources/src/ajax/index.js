import axios from "axios";
export default class Ajax {
  constructor() {
    let crsf = document.querySelector('meta[name="csrf-token"]');
    let headers = {
      "X-CSRF-TOKEN": crsf.content,
    };
    this.axios = axios.create({
      headers: headers,
    });
  }
  async post(url, data) {
    try {
      let req = await this.axios.post(url, data);
      let json = req.data;
      return json;
    } catch (err) {
      console.log(err.message);
      throw new Error("Erreur lors de la requête");
    }
  }
  async get(url) {
    try {
      let req = await this.axios.get(url);
      let json = req.data;
      return json;
    } catch (err) {
      console.log(err);
      throw new Error("Erreur lors de la réception de données");
    }
  }
}
