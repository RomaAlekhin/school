export default function(key = "", defaultValue = null) {
  const item = localStorage.getItem(key);
  return (item && JSON.parse(item)) || defaultValue;
}
