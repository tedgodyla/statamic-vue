const baseUrl = `${window.location.protocol}//${window.location.hostname}/api`;

const fetchApi = (url) => {
  return fetch(`${baseUrl}${url}`)
    .then(response => response.json())
    .then(data => data.data);
}

const fetchCollections = () => {
  return fetchApi(`/collections`);
}

const fetchCollection = (collection) => {
  return fetchApi(`/collections/${collection}`);
}

const fetchEntries = (collection, query = '') => {
  return fetchApi(`/collections/${collection}/entries${query}`);
}

const fetchEntry = (entry, collection) => {
  return fetchApi(`/collections/${collection}/entries/${entry}`);
}

const fetchEntryBySlug = (entry, collection) => {
  return fetchApi(`/collections/${collection}/entries/slug/${entry}`);
}

const fetchTerms = (taxonomy, query = '') => {
  return fetchApi(`/taxonomies/${taxonomy}/terms${query}`);
}

const fetchTerm = (term, taxonomy) => {
  return fetchApi(`/taxonomies/${taxonomy}/terms/${term}`);
}

const fetchTermEntries = (term, taxonomy) => {
  return fetchApi(`/taxonomies/${taxonomy}/terms/${term}/entries`);
}

const fetchNavs = () => {
  return fetchApi(`/navs`);
}

const fetchNav = (nav) => {
  return fetchApi(`/navs/${nav}`);
}

const fetchGlobals = () => {
  return fetchApi(`/globals`);
}

const fetchRoutes = () => {
  return fetchApi(`/routes`);
}

export {
  baseUrl,
  fetchApi,
  fetchCollections,
  fetchCollection,
  fetchEntries,
  fetchEntry,
  fetchEntryBySlug,
  fetchTerms,
  fetchTerm,
  fetchTermEntries,
  fetchNavs,
  fetchNav,
  fetchGlobals,
  fetchRoutes,
}
