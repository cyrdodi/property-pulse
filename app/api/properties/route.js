import connectDB from "@/config/database"

export const GET = async (request) => {

  try {
    await connectDB();
    return new Response(JSON.stringify({ message: 'Properties visited successfully!' }), { status: 200 })
  } catch (error) {
    console.log(error)
    return new Response('Somethings wrong', { status: 500 })

  }
}