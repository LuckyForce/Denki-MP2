console.log("New Entry");

const submit_button = document.getElementById("submit-button");
submit_button.addEventListener("click", submit, false);

async function submit() {
  console.log("Submit button clicked");

  //TODO: Check validity of inputs

  submitRequest({
    //TODO: Correct inputs
    title: document.getElementById("title").value,
    description: document.getElementById("description").value,
    place: document.getElementById("place").value,
    priority: Number(document.getElementById("priority").value),
    danger: Number(document.getElementById("danger").value),
    picture: document.getElementById("picture").files[0]?.name,
    picture_data: document.getElementById("picture").files[0]
      ? "" + (await toBase64(document.getElementById("picture").files[0])) + ""
      : null,
    agb: document.getElementById("agb").checked,
  });
}

async function submitRequest(params) {
  console.log("Submit request");
  console.log(params);
  //Validate Params
  if (
    !params.title ||
    !params.description ||
    !params.place ||
    !params.priority ||
    !params.danger ||
    !params.picture ||
    !params.picture_data ||
    !params.agb
  ) {
    console.error("Missing required parameters");
    document.getElementById("information-bad").innerText =
      "Bitte füllen Sie alle Felder aus.";
    return;
  }

  fetch(site + "api/entry.php", {
    body: JSON.stringify(params),
    method: "POST",
    headers: { "Content-Type": "application/json" },
  }).then((response) => {
    if (response.status === 201) {
      console.log("Entry created successfully");

      //Redirect to all entries with title filter
      window.location.href = site + "all?searchText=" + params.title;
    } else {
      console.error("Failed to create entry");
      console.error(response);
    }
  });
}

async function toBase64(file) {
  return new Promise((resolve, reject) => {
    const reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onload = () => resolve(reader.result);
    reader.onerror = (error) => reject(error);
  });
}
