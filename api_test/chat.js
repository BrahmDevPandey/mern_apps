const axios = require("axios");

const encodedParams = new URLSearchParams();
encodedParams.append("in", "Please do not gice useless answers?");
encodedParams.append("op", "in");
encodedParams.append("cbot", "1");
encodedParams.append("SessionID", "RapidAPI1");
encodedParams.append("cbid", "1");
encodedParams.append("key", "RHMN5hnQ4wTYZBGCF3dfxzypt68rVP");
encodedParams.append("ChatSource", "RapidAPI");

const options = {
  method: "POST",
  url: "https://robomatic-ai.p.rapidapi.com/api",
  headers: {
    "content-type": "application/x-www-form-urlencoded",
    "X-RapidAPI-Key": "603bba83admshf6a9f6ad08ad36dp1f0429jsne8904001b1ef",
    "X-RapidAPI-Host": "robomatic-ai.p.rapidapi.com",
  },
  data: encodedParams,
};

axios
  .request(options)
  .then(function (response) {
    console.log(response.data);
  })
  .catch(function (error) {
    console.error(error);
  });
