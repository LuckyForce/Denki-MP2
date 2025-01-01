console.log("New Entry");

const submit_button = document.getElementById("submit-button");
submit_button.addEventListener("click", submit, false);

async function submit() {
  console.log("Submit button clicked");

  submitRequest({
    title: document.getElementById("title").value,
    date: document.getElementById("date").value,
    entry: document.getElementById("entry").value,
  });
}

async function submitRequest(params) {
  fetch(site + "/api/entry", {
    body: JSON.stringify(params),
    method: "POST",
    headers: { "Content-Type": "application/json" },
  }).then((response) => {
    if (response.status === 201) {
      console.log("Entry created successfully");
    } else {
      console.error("Failed to create entry");
    }
  });
}
