const hexInput = document.getElementById("hexInput");
const rInput = document.getElementById("rInput");
const gInput = document.getElementById("gInput");
const bInput = document.getElementById("bInput");
const rRange = document.getElementById("rRange");
const gRange = document.getElementById("gRange");
const bRange = document.getElementById("bRange");
const colorPreview = document.getElementById("colorPreview");
const previewValue = document.getElementById("previewValue");
const errorMessage = document.getElementById("errorMessage");

const rgbInputs = [rInput, gInput, bInput];
const allInputs = [hexInput, rInput, gInput, bInput, rRange, gRange, bRange];

function toHex(value) {
  return value.toString(16).padStart(2, "0").toUpperCase();
}

function clearError() {
  errorMessage.textContent = "";
  allInputs.forEach((input) => input.classList.remove("is-invalid"));
}

function showError(message, targets) {
  clearError();
  errorMessage.textContent = message;
  targets.forEach((input) => input.classList.add("is-invalid"));
}

function updateColor(r, g, b) {
  const hex = `#${toHex(r)}${toHex(g)}${toHex(b)}`;

  hexInput.value = hex;
  rInput.value = r;
  gInput.value = g;
  bInput.value = b;
  rRange.value = r;
  gRange.value = g;
  bRange.value = b;
  colorPreview.style.background = hex;
  previewValue.textContent = `${hex} / rgb(${r}, ${g}, ${b})`;
  clearError();
}

function handleHexChange() {
  const value = hexInput.value.trim();
  const match = value.match(/^#?([0-9a-fA-F]{6})$/);

  if (!match) {
    showError("HEXは #RRGGBB 形式で入力してください。", [hexInput]);
    return;
  }

  const hex = match[1];
  updateColor(
    parseInt(hex.slice(0, 2), 16),
    parseInt(hex.slice(2, 4), 16),
    parseInt(hex.slice(4, 6), 16)
  );
}

function handleRgbChange() {
  if (rgbInputs.some((input) => input.value === "")) {
    showError("RGBは 0〜255 の整数で入力してください。", rgbInputs);
    return;
  }

  const r = Number(rInput.value);
  const g = Number(gInput.value);
  const b = Number(bInput.value);

  if ([r, g, b].some((value) => !Number.isInteger(value) || value < 0 || value > 255)) {
    showError("RGBは 0〜255 の整数で入力してください。", rgbInputs);
    return;
  }

  updateColor(r, g, b);
}

function handleSliderChange() {
  updateColor(Number(rRange.value), Number(gRange.value), Number(bRange.value));
}

hexInput.addEventListener("input", handleHexChange);
[rInput, gInput, bInput].forEach((input) => {
  input.addEventListener("input", handleRgbChange);
});
[rRange, gRange, bRange].forEach((range) => {
  range.addEventListener("input", handleSliderChange);
});

updateColor(74, 144, 226);
