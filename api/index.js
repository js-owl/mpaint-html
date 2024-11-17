const url = "https://mpaint.ru/api/articles.php";

const promise = (async () => {
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

  const del_raw = await fetch(`https://mpaint.ru/api/articles.php?id=1`, {
    method: "DELETE",
  });
  const del = await del_raw.json();

  console.log({ all }, { one }, { post }, { put }, { del });
})();

promise.catch(console.error);
