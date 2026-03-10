class DiviTypewriter {

  constructor(el) {
    this.el = el
    this.words = JSON.parse(el.dataset.words)
    this.speed = parseInt(el.dataset.speed || 120)
    this.pause = parseInt(el.dataset.pause || 2000)

    this.txt = ""
    this.loop = 0
    this.deleting = false

    this.tick()
  }

  tick() {

    const i = this.loop % this.words.length
    const word = this.words[i]

    if (this.deleting) {
      this.txt = word.substring(0, this.txt.length - 1)
    } else {
      this.txt = word.substring(0, this.txt.length + 1)
    }

    this.el.textContent = this.txt

    let delay = this.speed

    if (!this.deleting && this.txt === word) {
      delay = this.pause
      this.deleting = true
    }

    else if (this.deleting && this.txt === "") {
      this.deleting = false
      this.loop++
      delay = 400
    }

    setTimeout(() => this.tick(), delay)

  }

}

document.addEventListener("DOMContentLoaded", () => {

  document.querySelectorAll(".divi-typewriter").forEach(el => {
    new DiviTypewriter(el)
  })

})