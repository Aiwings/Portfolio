import axios from "axios";
export default class Ajax {
  constructor(needsLogin = false) {
    const crsf = document.querySelector('meta[name="csrf-token"]');
    const headers = {
      "X-CSRF-TOKEN": crsf.content,
      Accept: "application/json",
    };
    if (needsLogin) {
      const token = Ajax.getCookie("token");
      headers["Authorization"] = "Bearer " + token;
    }
    this.axios = axios.create({
      headers: headers,
    });
  }
  async request(url, method = "GET", data = null) {
    let confObj = {
      method: method,
      url: url,
    };
    if (data) {
      confObj["data"] = data;
    }
    try {
      let req = await this.axios(confObj);
      const json = req.data;
      return json;
    } catch (err) {
      console.log(err.message);
      throw new Error("Erreur lors de la requête");
    }
  }
  static getCookie(name) {
    let cookie = {};
    document.cookie.split(";").forEach(function (el) {
      let [key, value] = el.split("=");
      cookie[key.trim()] = value;
    });
    return cookie[name];
  }
}
