## Instrukcja autoryzacji API wersja 0.0.1
- Logujemy się na stronę https://seomatch.net
- Pobieramy z cookies ``SESSION`` wartość (poniższy kod możemy wkleić w konsolę)
```js
function getCookie(cookieName) {
  let cookie = {};
  document.cookie.split(';').forEach(function(el) {
    let [key,value] = el.split('=');
    cookie[key.trim()] = value;
  })
  return cookie[cookieName];
}
console.log(getCookie("SESSION"));
```
