import GoogleProvider from 'next-auth/providers/google';

export const authOptions = {
  providers: [
    GoogleProvider({
      clientId: process.env.GOOGLE_CLIENT_ID,
      clientSecret: process.env.GOOGLE_CLIENT_SECRET,
      // when login, user can choose another account. delete if u want user only can login with same account
      authorization: {
        params: {
          prompt: "consent",
          access_type: "offline",
          response_type: "code"
        }
      }
    })
  ],
  callbacks: {
    // Invoked on successful siginin
    async signIn({ profile }) {
      // 1. Connect to database
      // 2. Check if user exists
      // 3. If not, then add user to database
      // 4. Return true to allow sign in
    },
    // Modiifes the session object
    async session({ session }) {
      // 1. Get user from database
      // 2. Assign the user id to the session
      // 3. return session
    }
  }
}