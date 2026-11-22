<!DOCTYPE html>
<html lang="en-NZ">
<head>
  <meta charset="utf-8">
  <title>Job Pack Maker bridge | Soffit Web</title>
  <meta name="robots" content="noindex, nofollow">
</head>
<body>
<script>
window.addEventListener("message", function (event) {
  if (event.origin !== window.location.origin) return;
  if (event.data && event.data.type === "BRIDGE_PHOTO") {
    localStorage.setItem("job_pack_transfer", JSON.stringify(event.data.payload));
  }
});
</script>
</body>
</html>
