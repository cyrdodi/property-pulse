const apiDomain = process.env.NEXT_PUBLIC_API_DOMAIN || null;

async function  fetchProperties() {
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

async function fetchProperty(id) {
  try {
    // check if api domain is available
    if (!apiDomain) {
      console.log('Api domain not available')
      return null;
    }

    const res = await fetch(`${apiDomain}/properties/${id}`)

    if (!res.ok) {
      throw new Error('Failed to fetch data')
    }

    return res.json()

  } catch (error) {
    console.log(error)
    return null;
  }
}

export { fetchProperties, fetchProperty }