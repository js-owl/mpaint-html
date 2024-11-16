let a = 5;
console.log("api", a);

function makeRequest(url, options = {}) {
  console.log("|-makeRequest", { url });
  return fetch(url, options).then((response) => {
    if (response.status === 200) {
      return response.json();
    }

    return response.text().then((text) => {
      throw new Error(text);
    });
  });
}

function all() {
  return makeRequest(`https://mpaint.ru/api/articles.php`);
}

function one(id) {
  return makeRequest(`https://mpaint.ru/api/articles.php?id=${id}`);
}

function add(title, content) {
  console.log("|-add", { title });
  let body = new FormData();
  body.append("title", title);
  body.append("content", content);

  return makeRequest(`https://mpaint.ru/api/articles.php`, {
    method: "POST",
    body,
  });
}

all().then(console.log).catch(console.warn);
one("1").then(console.log).catch(console.warn);
