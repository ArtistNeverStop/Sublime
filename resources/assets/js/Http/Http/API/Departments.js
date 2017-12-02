// import axios from '@/Http'

// export default {
//   get: (params, fields = null) => axios.get(`/graphql`, {
//     params: {
//       query: `{
//         departments ${ fields ? `(${ Object.entries(fields).map(field => `${field[0]}: ${field[1]}`).join(', ') })` } {
//           id,
//           name,
//           categories {
//             id,
//             category_id,
//             name
//           },
//           products (limit: 5, offset: 0) {
//             id,
//             name,
//             url,
//             thumbnail_path,
//             count
//           }
//         }
//       }`
//     }
// }

//       departments {
//           id,
//           name,
//           categories {
//             id,
//             category_id,
//             name
//           },
//           products (limit: 5, offset: 0) {
//             id,
//             name,
//             url,
//             thumbnail_path,
//             count
//           }
//         }
//       }