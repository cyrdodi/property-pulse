const apiDomain = process.env.NEXT_PUBLIC_API_DOMAIN || null;

const fetchProperties = async () => {
  try {
    // check if api domain is available
    if (!apiDomain) {
      console.log('Api domain not available')
      return [];
    }

    const res = await fetch(`${apiDomain}/properties`)

    if (!res.ok) {
      throw new Error('Failed to fetch data')
    }

    return res.json()

  } catch (error) {
    console.log(error)
    return [];
  }
}

export { fetchProperties }