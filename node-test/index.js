const bcrypt = require('bcrypt')

async function main() {
    const secret = process.argv[3]
    const hash = process.argv[2];
    const token = {"userId":5,"createdWhen":1560764167000,"hash":hash}
    const plainText = [token.userId, token.createdWhen, secret].join('|')
    const result = await bcrypt.compare(plainText, token.hash.replace(/^\$2y\$/, '$2b$'))
    console.log(result)
}

main()