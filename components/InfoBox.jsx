const InfoBox = ({
  heading,
  backgroundColor = "bg-gray-100",
  textColor = "text-gray-800",
  buttonInfo,
  children,
}) => {
  return (
    <div className="bg-blue-100 p-6 rounded-lg shadow-md">
      <h2 className="text-2xl font-bold">{heading}</h2>
      <p className="mt-2 mb-4">{children}</p>
      <a
        href={ buttonInfo.link}
        className={`${buttonInfo.backgroundColor} inline-block  text-white rounded-lg px-4 py-2 hover:bg-blue-600`}
      >
        { buttonInfo.text}
      </a>
    </div>
  );
};

export default InfoBox;
