const url = "https://mpaint.ru/api/articles.php";
(async () => {
  const all_raw = await fetch(url);
  const all = await all_raw.json();
  console.log({ all });
})();
// function makeRequest(url, options = {}) {
//   return fetch(url, options).then((response) => {
//     if (response.status === 200) {
//       return response.json();
//     }

//     return response.text().then((text) => {
//       throw new Error(text);
//     });
//   });
// }

// function all() {
//   console.log("|-all");
//   return makeRequest(url);
// }

// function one(id) {
//   console.log("|-one", { id });
//   return makeRequest(`https://mpaint.ru/api/articles.php?id=${id}`);
// }

// function add(t) {
//   console.log("|-add", { t });
//   let body = new FormData();
//   body.append("t", t);

//   return makeRequest(url, {
//     method: "POST",
//     body,
//   });
// }

// all().then(console.log).catch(console.warn);
// one("1").then(console.log).catch(console.warn);
// add("td").then(console.log).catch(console.warn);

// one("3").then(console.log).catch(console.warn);
