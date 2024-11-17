const url = "https://mpaint.ru/api/articles.php";
(async () => {
  const all_raw = await fetch(url);
  const all = await all_raw.json();

  const one_raw = await fetch(`https://mpaint.ru/api/articles.php?id=1`);
  const one = await one_raw.json();

  let body = new FormData();
  body.append("t", "td");
  const post_raw = await fetch(url, {
    method: "POST",
    body,
  });
  const post = await post_raw.json();

  const put_raw = await fetch(url, {
    method: "PUT",
    body: JSON.stringify({ id: 2, t: "te" }),
  });
  const put = await put_raw.json();

  console.log({ all }, { one }, { post }, { put });
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
